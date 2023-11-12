<?php
function cek_login()
{
    $CI = &get_instance();
    if ($CI->session->userdata('role_id') == null || $CI->session->userdata('id_user') == null) {
        $CI->session->set_flashdata('message', '<div class="alert alert-info text-center" role="alert">Anda tidak memiliki akses, silahkan untuk melakukan Login !</div>');

        redirect('Login', 'refresh');
    }
    //no resubmission
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache');
}

function role1()
{
    $CI = &get_instance();
    if ($CI->session->userdata('role_id') != 1) {
        redirect('noaccess', 'refresh');
    }
}

function role2()
{
    $CI = &get_instance();
    if ($CI->session->userdata('role_id') != 2) {
        redirect('noaccess', 'refresh');
    }
}

function belumtersedia()
{
    redirect('belumtersedia', 'refresh');
}