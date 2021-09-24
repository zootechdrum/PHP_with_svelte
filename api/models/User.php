<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Databasesql;
    }
    public function login($userName, $password)
    {
        $employee = $this->checkIfEmployee($userName, $password);

        if (!empty($employee)) {
            return $employee;
        }

        $checkDealer = $this->checkIfDealer($userName, $password);

        if (!empty($checkDealer)) {
            return $checkDealer;
        }

        $checkContacts = $this->checkIfCustomerCntcs($userName, $password);

        if (!empty($checkContacts)) {
            return $checkContacts;
        }
    }

    public function checkIfEmployee($userName, $password)
    {
        //Check if it is a fleetwood employee.

        $this->db->query("SELECT DISTINCT e_mail, Users.full_name, Users.User_code, Users.Deparment, customer_users.dealer_code, customer_users.web_dealer_docs, customer_users.web_service, customer_users.web_quotes FROM Users LEFT JOIN	customer_users ON Users.E_mail = customer_users.email WHERE (Users.user_code = :userName1 AND Users.Password = :password1) OR (customer_users.email = :userName2 AND customer_users.web_pw = :password2 AND customer_users.dealer_code = '1120')");
        $this->db->bind(':userName1', $userName);
        $this->db->bind(':password1', $password);
        $this->db->bind(':userName2', $userName);
        $this->db->bind(':password2', $password);
         $row = $this->db->single();
         return $row;
    }

    public function checkIfDealer($userName, $password)
    //Generic login from when we first started
    {
        $login_concat = strtoupper($userName . ";" . $password);

        $this->db->query("SELECT CUST_CODE, CUST_NAME, UDF3, UDF4, SALES_PERSON, mult FROM CUSTOMERS WHERE (((UDF3) like '$login_concat') AND ((UDF4) like 'true%') AND ((SALES_PERSON)<>'IN'));  ");

        return $row = $this->db->single();
    }
    public function checkIfCustomerCntcs($userName, $password)
    {

        $this->db->query("
            SELECT
                CUSTOMERS.CUST_CODE,
                CUSTOMERS.CUST_NAME,
                CUSTOMERS.UDF3,
                CUSTOMERS.UDF4,
                CUSTOMERS.SALES_PERSON,
                CUSTOMERS.mult,
                CUSTOMERS.cloud_active,
                customer_users.contact,
                customer_users.email,
                customer_users.web_pw,
                customer_users.web_service,
                customer_users.web_quotes,
                customer_users.web_dealer_docs,
                customer_users.ck_snapshot,
                customer_users.cloud_security_qte,
                customer_users.cloud_user_type_customers,
                customer_users.cloud_security_customers,
                customer_users.qte_suff,
                customer_users.qte_def_fin_ext_code,
                customer_users.qte_def_fill_code_door,
                customer_users.qte_def_fill_code_win
                FROM
                CUSTOMERS INNER JOIN 
                    customer_users
                        ON CUSTOMERS.CUST_CODE = customer_users.dealer_code
        				WHERE
        					(CUSTOMERS.UDF4 like 'true%') AND 
        					(CUSTOMERS.SALES_PERSON <> 'IN') AND
        					(customer_users.email like :userName) AND
        					(customer_users.web_pw like :password) AND
        					(customer_users.email != '' AND customer_users.web_pw != '');

            ");
        $this->db->bind(':userName', $userName);
        $this->db->bind(':password', $password);

        return $row = $this->db->single();
    }
}
