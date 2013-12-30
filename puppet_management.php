<?php
class Puppet {

    protected $headers;
    protected $ch;

    public function __construct($host) {

        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_USERAGENT,'Mozilla/4.0 (compatible; Nis PHP bot; '.php_uname('a').'; PHP/'.phpversion().')');
        curl_setopt($this->ch, CURLOPT_URL, 'https://puppet_host:8140/production/certificate_status/'.$host);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        }


    public function puppet_signed() {
        $headers = array('Content-Type: text/pson');
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

        $request="PUT";
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $request);

        $post_data = '{"desired_state":"signed"}';
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);

        $res = curl_exec($this->ch);
    }


    public function puppet_revoked() {
        $headers = array('Content-Type: text/pson');
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

        $request="PUT";
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $request);

        $post_data = '{"desired_state":"revoked"}';
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);

        $res = curl_exec($this->ch);
    }


    public function puppet_delete() {
        $headers = array('Accept: pson');
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

        $request="DELETE";
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $request);

        $res = curl_exec($this->ch);
        return $res;
    }

}

?>
