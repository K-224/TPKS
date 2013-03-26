<?PHP
/**
 * AsyncHttp - ����� ��� ������ � http ����� ������������� ������
 *
 * @author Jeck (http://jeck.ru)
 */
class AsyncHttp {
    private $sockets = array();
    private $threads = array();
    
    /**
     * ������� ����� � ���������� http ������
     * @param string $url ����� �� ������� ������������ ������
     * @param string $method ��� �������, POST ��� GET
     * @param array $data ������ ������������ ��� POST ��������
     * @return int $id ������������� �������
     * @return false � ������ ������
     */
    private function request($url, $method='GET', $data=array()) {
        $parts = parse_url($url);
        if (!isset($parts['host'])) {
            return false;
        }
        if (!isset($parts['port'])) {
            $parts['port'] = 80;
        }
        if (!isset($parts['path'])) {
            $parts['path'] = '/';
        }
        if ($data && $method == 'POST') {
            $data = http_build_query($data);
        } else {
            $data = false;
        }
        
        $socket = socket_create(AF_INET, SOCK_STREAM, 0);
        socket_connect($socket, $parts['host'], $parts['port']);
        // ���� ���������� ���� �� socket_connect ���������� �� ����������
        socket_set_nonblock($socket);
        
        socket_write($socket, $method." ".$parts['path']." HTTP/1.1\r\n");
        socket_write($socket, "Host: ".$parts['host']."\r\n");
        socket_write($socket, "Connection: close\r\n");
        if ($data) {
            socket_write($socket, "Content-Type: application/x-www-form-urlencoded\r\n");
            socket_write($socket, "Content-length: ".strlen($data)."\r\n");
            socket_write($socket, "\r\n");
            socket_write($socket, $data."\r\n");
        }
        socket_write($socket, "\r\n");
        
        $this->sockets[] = $socket;
        return max(array_keys($this->sockets));
    }
    
    /**
     * ��������� GET ������ � ������� ������ AsyncHttp::request
     * @see function request
     * @param string $url
     * @return int $id
     */
    public function get($url) {
        return $this->request($url, 'GET');
    }
    
    /**
     * ��������� POST ������ � ������� ������ AsyncHttp::request
     * @see function request
     * @param string $url
     * @param array $data
     * @return int $id
     */
    public function post($url, $data=array()) {
        return $this->request($url, 'POST', $data);
    }
    
    /**
     * �������� ������ �� ������� � ���������� ������ ���������������
     * ������� ����������� �������� � ������ ������
     * @return bool|array
     */
    public function iteration() {
        if (count($this->sockets) == 0) {
            return false;
        }
        $threads = array();
        foreach ($this->sockets as $key => $socket) {
            $data = socket_read($socket, 0xffff);
            if ($data) {
                $threads[] = $key;
                $this->setThread($key, $data);
                unset($this->sockets[$key]);
                continue;
            }
        }
        // �� ������ ������
        usleep(5);
        return $threads;
    }
    
    /**
     * ������������� ����� ������
     * @return void
     */
    private function setThread($id, $data) {
        $this->threads[$id] = $data;
    }
    
    /**
     * ���������� ���������� ������ �� ������
     * @param int $id ������������� ������
     * @param bool $headers=false ���� true ���������� ������ ������ � �����������
     * @return bool|array
     */
    public function getThread($id, $headers=false) {
        if (!isset($this->threads[$id])) {
            return false;
        }
        if ($headers) {
            return $this->threads[$id];
        } else {
            return substr($this->threads[$id], strpos($this->threads[$id], "\r\n\r\n") + 4);
        }
    }
}


$async = new AsyncHttp;

$async->get('http://example.com');
$async->get('http://example.net');
$async->get('http://example.org');

while (($threads = $async->iteration()) !== false) {
    foreach ($threads as $id) {
        echo $async->getThread($id);
    }
}
?>