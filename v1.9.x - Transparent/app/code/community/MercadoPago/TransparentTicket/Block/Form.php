<?php
/**
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL).
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* @category   	Payment Gateway
* @package    	MercadoPago
* @author      	Gabriel Matsuoka (gabriel.matsuoka@gmail.com)
* @copyright  	Copyright (c) MercadoPago [http://www.mercadopago.com]
* @license    	http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/


class MercadoPago_TransparentTicket_Block_Form extends Mage_Payment_Block_Form_Cc{
    
    protected function _construct(){
        
        // Route: /checkout/onepage
        // inicia formulario para a escolha de pagamento
        parent::_construct();
        
        $this->setTemplate('mercadopago/transparent_ticket/form.phtml');
        
    }
    
    function getTicketsOptions(){
        $payment_methods = Mage::getModel('mercadopago_transparentticket/transparent')->getPaymentMethods();
        $tickets = array();
        
        //percorre todos os payments methods
        foreach($payment_methods['response'] as $pm){
            
            //filtra por tickets
            if($pm['payment_type_id'] == "ticket"){
                $tickets[] = $pm;
            }
        }
        
        return $tickets;
    }
}




?>
