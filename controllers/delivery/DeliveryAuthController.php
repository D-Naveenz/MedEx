<?php

namespace app\controllers\Delivery;

use app\core\Controller;
use app\core\Request;
use app\models\DeliveryModel;


class DeliveryAuthController extends Controller
{

    public function deliveryRegister(Request $request)
    {
        if ($request->isPost()) {

            $delivery = new DeliveryModel();
            $delivery -> loadData($request->getBody());

            if ($delivery->validate() && $delivery->registerDeliveryPartner()) {
                header("Location: /delivery/login");
            }
            if ($_POST['password'] != $_POST['confirmPassword']) {
                echo (new \app\core\ExceptionHandler)->passwordDoesNotMatch();
                return $this->render('registrationPage/delivery_partner_register_page/deliregister.php');
            }

            return $this->render('registrationPage/delivery_partner_register_page/deliregister.php');
        }
        return $this->render('registrationPage/delivery_partner_register_page/deliregister.php');
    }






}
