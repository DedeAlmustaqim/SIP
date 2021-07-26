<?php
class Template{
    function __construct()
    {
        $this->_ci = &get_instance();
        
    }
    function konten ($content, $data = null){
        $data['konten'] = $this->_ci->load->view($content, $data, TRUE);

        $this->_ci->load->view('template', $data);
    }
}

?>