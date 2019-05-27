<?php

class Login_model extends MY_Model {

    function loginCheck($data) {

        $this->db->where('email', $data['email']);
        $row = $this->db->get('user')->row_array();

        if (!empty($row)) {
            /* Set Session */
            if ($row['password'] == md5($data['password']) && $row['status'] == '1' && $row['is_verify'] == '1') {


                /* Check User Type and redirect to respective login */

                if ($row['type'] == 'A') {
                    $sessionData['valid_login'] = [
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'firstname' => $row['first_name'],
                        'lastname' => $row['last_name'],
                    ];
                    $this->session->set_userdata($sessionData);
                    $url = admin_url() . 'dashboard';
                } else if ($row['type'] == 'C') {
                    $sessionData['client_login'] = [
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'firstname' => $row['first_name'],
                        'lastname' => $row['last_name'],
                        'companyId' => $row['company_id'],
                    ];
                    $this->session->set_userdata($sessionData);
                    $url = client_url() . 'dashboard';
                }

                $json_response['status'] = 'success';
                $json_response['message'] = 'Well done Login Successfully Done';
                $json_response['redirect'] = $url;
            } else if ($row['password'] != md5($data['password'])) {
                /* Check Password Match */
                $json_response['status'] = 'error';
                $json_response['message'] = 'Password does not match';
            } else if ($row['is_verify'] == '0') {
                /* Check User is verify or not */
                $json_response['status'] = 'error';
                $json_response['message'] = 'Please Varify Your Email Address';
            } else if ($row['status'] == '0') {
                /* Check User is approve or not */
                $json_response['status'] = 'error';
                $json_response['message'] = 'Your Account is not yet approve by admin';
            }
        } else {
            /* User name and passwod does not match */
            $json_response['status'] = 'error';
            $json_response['message'] = 'Email address and password does not match';
        }

        return $json_response;
    }

    /**
     * genrateForgotPasswordLink
     * This method send an email to user's email it sends a tokened link for change users password
     *
     * @param $txtEmail will
     *        	be an email address of user
     * @return return error or success messages as per conditions
     */
    public function genrateForgotPasswordLink() {
        $txtEmail = $this->utility->encodeText($this->input->post('txtEmail'));
        $data ['where'] = [
            'email' => $txtEmail
        ];
        $data ['table'] = TABLE_USER;
        $response = $this->isDuplicate($data);
        /* if email is registered in our system this condition will be exicute */
        if ($response === true) {
            unset($data);
            $data ['select'] = [
                'first_name',
                'last_name',
                'id'
            ];
            $data ['table'] = TABLE_USER;
            $data ['where'] = [
                'email' => $txtEmail
            ];
            $response = $this->selectRecords($data);
            $response = $response [0];

            /* always delete old links then gen. new token */
            unset($data);
            $data ["where"] = [
                "user_id" => $response->id
            ];
            $data ["table"] = TABLE_FORGOT_PASSWORD;
            $this->deleteRecords($data);

            unset($data);
            $dataToken = md5(time() . $txtEmail);
            $data ['insert'] ['user_id'] = $response->id;
            $data ['insert'] ['token'] = $dataToken;
            $data ['insert'] ['created_date'] = date('Y-m-d h:i:s');
            $data ['table'] = TABLE_FORGOT_PASSWORD;
            $insertionResponse = $this->insertRecord($data);
            /* if record not inserted then exicute this condition */
            if (!$insertionResponse) {
                return [
                    'danger',
                    DEFAULT_MESSAGE
                ];
            }

            $data ['username'] = $response->first_name . ' ' . $response->last_name;
            $data ['link'] = SITE_URL . $this->myvalues->loginDetails ['controller'] . '/changePassword/' . $dataToken;
            $data ['message'] = $this->load->view('email_template/forgot_password_mail', $data, true);
            $data ['from_title'] = 'Verify user email address';
            $data ['subject'] = 'Verify user email address';
            $data ["to"] = $txtEmail;
            $this->utility->sendMailSMTP($data);
            return [
                'success',
                'An email sent to your registered email address please check email and change your password'
            ];
        } else {

            return [
                'danger',
                'Sorry! this email not found in our system'
            ];
        }
    }

    public function registration($postData) {

        $data['insert']['type'] = '3';
        $data['insert']['first_name'] = $postData['fname'];
        $data['insert']['last_name'] = $postData['lname'];
        $data['insert']['email'] = $postData['email'];
        $data['insert']['password'] = md5($postData['password']);
        $data['insert']['is_verify'] = '0';
        $data['insert']['status'] = '0';
        $data['insert']['created_date'] = date('Y-m-d h:i:s');
        $data['table'] = 'user';
        $responseId = $this->insertRecord($data);
//            echo $this->db->last_query(); exit();
//            echo $responseId; exit(); 
        if ($responseId) {

            unset($data);
            $dataToeken = md5($postData['email'] . time() . $postData['password']);
            $data['update']['veryfication_token'] = $dataToeken;
            $data['where'] = ['id' => $responseId];
            $data['table'] = 'user';
            $this->updateRecords($data);
            unset($data);
            $data['username'] = $postData['fname'] . ' ' . $postData['lname'];
            $data['link'] = base_url() . 'account/verifyEmail/' . $dataToeken;
            $data['message'] = $this->load->view('email_template/registration_mail', $data, true);
            $data['from_title'] = PROJECT_NAME;
            $data['subject'] = 'Verify user email address';
            $data["to"] = $postData['email'];

            $this->utility->sendMailSMTP($data);

            unset($data);
            /* insert null value in borrower_setting table latter user will update it from details page */
            $data ['insert'] ['traveler_id'] = $responseId;
            $data ['insert'] ['created_date'] = date('Y-m-d h:i:s');
            $data ['table'] = TABLE_TRAVEL_SETTING;
            $this->insertRecord($data);

            return $responseId;
        } else {
            return false;
        }
    }

    public function verifyUserByToken($token) {
        $data['select'] = ['id'];
        $data['table'] = TABLE_USER;
        $data['where'] = ['veryfication_token' => $token, 'is_verify' => '0'];
        $response = $this->selectRecords($data);

        if ($response[0]->id > 0) {
            unset($data);
            $data['update']['veryfication_token'] = '';
            $data['update']['is_verify'] = '1';
            $data['where'] = ['id' => $response[0]->id];
            $data['table'] = TABLE_USER;
            $this->updateRecords($data);
            return true;
        } else {
            return false;
        }
    }

    public function sendEmail($data) {
        $data ['message'] = $data['message'];
        $data ['from_title'] = 'ferryservice';
        $data ['subject'] = 'Contact Us';
        $data ["bcc"] = 'shaileshvanaliya91@gmail.com';
        $result = $this->utility->sendMailSMTP($data);
        return $result;
    }

}