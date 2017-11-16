<?php

namespace Kanboard\Controller;

/**
 * Class User List Controller
 *
 * @package Kanboard\Controller
 * @author  Frederic Guillot
 */
class UserListController extends BaseController
{
    /**
     * List all users
     *
     * @access public
     */
    public function show()
    {
        $paginator = $this->userPagination->getListingPaginator();

        $this->response->html($this->helper->layout->app('user_list/listing', array(
            'title' => t('Users').' ('.$paginator->getTotal().')',
            'paginator' => $paginator,
        )));
    }

    /**
     * Search in users
     *
     * @access public
     */
    public function search()
    {
        $search = urldecode($this->request->getStringParam('search'));
        $paginator = $this->userPagination->getListingPaginator();

        // TODO: Big mistery: How to create a $userFilter?

        if ($search !== '' && ! $paginator->isEmpty()) {
            $paginator
                ->setQuery(
                    $this->userModel
                    ->getQuery()
                    ->withFilter($userFilter)
                )
                ->calculate();
        }

        $this->response->html($this->helper->layout->app('user_list/listing', array(
            'title' => t('Users').' ('.$paginator->getTotal().')',
            'values' => array(
                'search' => $search,
            ),
            'paginator' => $paginator
        )));
    }

}
