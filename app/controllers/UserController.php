<?php


class UserController extends Controller
{
    // GET
    public function index($name = '') {
        echo '<br /><br />USER COTROLLER<br /><br />';
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo '<br /><br />GEEETT<br />';

            // passed by url
            echo 'name '.$name.'<br/>';

            // User - instantiate object user
            $user = $this->model('User');
            $userData = $user->getUserByName($name);
            var_dump('<br />Show userData: ',$userData);


            // Category - instantiate object category
            $category = $this->model('Category');
            $categoryData = $category->getCategoryById($userData['category_id']);
            var_dump($categoryData);

            echo '<br />'.$categoryData['name'];

            // user/index in view is a path to view/home/index
            $this->view('user/index', [
                'id' => $userData['id'],
                'category' => $categoryData['name'],
                'name' => $userData['name'],
                'nationality' => $userData['nationality'],
                'age' => $userData['age'],
            ]);

        }
    }

    public function showall() {

        if($_SERVER['REQUEST_METHOD'] == 'GET') {

             // User - instantiate object user
            $user = $this->model('User');
            $userData = $user->getAllUsers(); // returns array not object
            //var_dump('<br />Show userData: ',$userData);
            echo '<br /><br />';
            $this->view('user/showall', $userData);


        }
    }



    // POST
    // http://mvcapp.local/user/store
    // data[0][category_id]
    // data[0][name]
    // data[0][nationality]
    // data[0][age]
    // data[1][category_id]
    // data[1][name]
    public function store() {
        //POST from POSTMEN as x-www-form-urlencoded
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<br /><br />POOOST<br />';

            $data = $_POST['data'];
            var_dump('dasdsadas',$data);
            echo '<br /><br />';
            $user = $this->model('User');
            $response = $user->storeUserArray($data);

            if($response) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        }

    }
    // DELETE user http://mvcapp.local/user/delete
    public function delete() {

        //DELETE
        if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            echo '<br /><br />DELETE<br />';
            $xwwwurlencoded = file_get_contents('php://input');
            print_r($xwwwurlencoded);
            echo '<br />';
            parse_str($xwwwurlencoded, $data);


            echo '<br />';
            var_dump('Data', $data );

            $user = $this->model('User');
            $response = $user->deleteUser($data);
            if($response) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        }

    }

    public function update() {

        //PUT
        if($_SERVER['REQUEST_METHOD'] == 'PUT') {
            echo '<br /><br />PUT<br />';
            $xwwwurlencoded = file_get_contents('php://input');
            print_r($xwwwurlencoded);
            echo '<br />';
            parse_str($xwwwurlencoded, $data);

            $user = $this->model('User');
            $response = $user->updateUser($data);

            // zrob update
        }

    }



}