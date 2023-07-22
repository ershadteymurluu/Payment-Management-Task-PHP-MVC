 <?php
    class Payments extends CI_Controller
    {
        public function add_payment_type()
        {
            if ($this->input->is_ajax_request()) {
                $this->form_validation->set_rules(
                    'name',
                    'Payment Type Name',
                    'required',
                    array(
                        'required' => 'XETA: Bu xana boş buraxılmamalıdır!',
                    )
                );

                if ($this->form_validation->run()) {
                    $data = array(
                        'name' => $this->input->post('name')
                    );

                    $this->Payment_model->addPaymentType($data);

                    $response['success'] = true;
                    $response['message'] = 'Ödəniş növü müvəffəqiyyətlə əlavə edildi.';
                    echo json_encode($response);
                    return;
                } else {
                    $response['success'] = false;
                    $response['errors'] = $this->form_validation->error_array();
                    echo json_encode($response);
                    return;
                }
            }

            $this->load->view('templates/header');
            $this->load->view('payments/add_payment_type');
            $this->load->view('templates/footer');
        }
        public function add_currency()
        {
            if ($this->input->is_ajax_request()) {
                $this->form_validation->set_rules(
                    'name',
                    'Currency Name',
                    'required',
                    array(
                        'required' => 'XETA: Bu xana boş buraxılmamalıdır!',
                    )
                );

                if ($this->form_validation->run()) {
                    $data = array(
                        'name' => $this->input->post('name')
                    );

                    $this->Payment_model->addCurrency($data);

                    $response['success'] = true;
                    $response['message'] = 'Valyuta əlavə edildi.';
                    echo json_encode($response);
                    return;
                } else {
                    $response['success'] = false;
                    $response['errors'] = $this->form_validation->error_array();
                    echo json_encode($response);
                    return;
                }
            }

            $this->load->view('templates/header');
            $this->load->view('payments/add_currency');
            $this->load->view('templates/footer');
        }

        public function add_payment()
        {
            if ($this->input->is_ajax_request()) {
                $this->form_validation->set_rules(
                    'amount',
                    'Ödəniş Məbləği',
                    'required|numeric|greater_than[0]',
                    array(
                        'required' => 'Bu xana boş buraxılmamalıdır!',
                        'numeric' => 'Yalnız rəqəm daxil edilə bilər',
                        'greater_than' => 'Yalnız 0 dan böyük rəqəmlər əlavə edilə bilər.'
                    )
                );
                $this->form_validation->set_rules(
                    'category',
                    'Kateqoriya',
                    'required',
                    array(
                        'required' => 'Bu xana boş buraxılmamalıdır!',
                    )
                );
                $this->form_validation->set_rules(
                    'currency',
                    'Valyuta',
                    'required',
                    array(
                        'required' => 'Bu xana boş buraxılmamalıdır!',
                    )
                );
                $this->form_validation->set_rules(
                    'type',
                    'Ödəniş Növü',
                    'required|in_list[mədaxil,məxaric]',
                    array(
                        'required' => 'Bu xana boş buraxılmamalıdır!',
                    )
                );


                if ($this->form_validation->run()) {
                    $data = array(
                        'amount' => $this->input->post('amount'),
                        'category_id' => $this->input->post('category'),
                        'currency_id' => $this->input->post('currency'),
                        'type' => $this->input->post('type'),
                        'note' => $this->input->post('comment')
                    );

                    $this->Payment_model->addPayment($data);

                    $response['success'] = true;
                    $response['message'] = 'Ödəniş müvəffəqiyyətlə əlavə edildi.';
                    echo json_encode($response);
                    return;
                } else {
                    $response['success'] = false;
                    $response['errors'] = $this->form_validation->error_array();
                    echo json_encode($response);
                    return;
                }
            }


            $data['categories'] = $this->Payment_model->getCategories();
            $data['currencies'] = $this->Payment_model->getCurrencies();

            $this->load->view('templates/header');
            $this->load->view('payments/add_payment', $data);
            $this->load->view('templates/footer');
        }

        public function payment_table()
        {
            if ($this->input->is_ajax_request()) {
                $currencyId = $this->input->post('currency');
                $categoryId = $this->input->post('category');
        
                $data['payments'] = $this->Payment_model->getFilteredPayments($currencyId, $categoryId);
        
                $totalIncome = 0;
                $totalExpense = 0;
                foreach ($data['payments'] as $payment) {
                    if ($payment['type'] === 'mədaxil') {
                        $totalIncome += $payment['amount'];
                    } elseif ($payment['type'] === 'məxaric') {
                        $totalExpense += $payment['amount'];
                    }
                }
        
                $overallBalance = $totalIncome - $totalExpense;
        
                $response['payments'] = $data['payments'];
                $response['totalIncome'] = $totalIncome;
                $response['totalExpense'] = $totalExpense;
                $response['overallBalance'] = $overallBalance;
        
                echo json_encode($response);
                return;
            }


            $data['payments'] = $this->Payment_model->getPayments();

            $data['categories'] = $this->Payment_model->getCategories();
            $data['currencies'] = $this->Payment_model->getCurrencies();

            $totalIncome = 0;
            $totalExpense = 0;
            foreach ($data['payments'] as $payment) {
                if ($payment['type'] === 'mədaxil') {
                    $totalIncome += $payment['amount'];
                } elseif ($payment['type'] === 'məxaric') {
                    $totalExpense += $payment['amount'];
                }
            }

            $overallBalance = $totalIncome - $totalExpense;

            $data['totalIncome'] = $totalIncome;
            $data['totalExpense'] = $totalExpense;
            $data['overallBalance'] = $overallBalance;

            $this->load->view('templates/header');
            $this->load->view('payments/payment_table', $data);
            $this->load->view('templates/footer');
        }
    }
