<?php
/**
 * Created by PhpStorm.
 * User: Harika PC
 * Date: 11/3/2018
 * Time: 5:51 PM
 */

namespace App\Models;

use Bigcommerce\Api\Client;


class Customers
{
    /**
     * Get total number of customers in the store using customers count API
     *
     * @return int Count of customers
     */
    public function getCustomersCount()
    {
        return Client::getCustomersCount();
    }

    /**
     * Get customer details by passing customer id
     *
     * @param int $customerId
     * @return array Customer details array
     */
    public function getCustomer($customerId)
    {
        $customerData = array();
        $customerDetails = Client::getCustomer($customerId);
        if (!empty($customerDetails)) {
            $customerData = $customerDetails;
        }
        return $customerData;
    }

    /**
     * Get specified number of customers
     *
     * @param int $pageNum
     * @param int $itemsPerPage
     * @return array Array of customers
     */
    public function getCustomers($pageNum, $itemsPerPage)
    {
        $customersList = array();

        //Get specified number of customers from "List Customers API" by passing filter parameters
        $filter = array('page' => $pageNum, 'limit' => $itemsPerPage);
        $customersData = Client::getCustomers($filter);
        if (!empty($customersData)) {
            $customersList = $customersData;
        }
        return $customersList;
    }


}