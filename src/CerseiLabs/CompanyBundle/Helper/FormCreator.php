<?php

namespace CerseiLabs\CompanyBundle\Helper;


/**
 * FormCreator
 *
 */
class FormCreator
{

    private $formFields = array();

    public function addField($newField)
    {
        $this->formFields[] = $newField;
    }

    public function HTMLize()
    {

        $totalHTML = "";

        foreach ($this->formFields as $formField) {

            $form_elemType = $formField["type"];
            $form_elemId = $formField["id"];
            $form_elemClasses = $formField["classes"];

            if (isset($formField["args"])) {
                $optionsHTML = "";

                foreach ($formField["args"] as $option) {
                    $optionsHTML .= "<option value=\"" . $option->getId() . "\">" . $option->getFullname() . "</option>";
                }
            }

            switch ($form_elemType) {

                case "select" :
                    $totalHTML .= "<select id=\"" . $form_elemId . "\" class=\"" . $form_elemClasses . "\" >" . $optionsHTML . "</select>";
                    break;
                case "text" :
                    $totalHTML .= "<input type=\"text\" id=\"" . $form_elemId . "\" class=\"" . $form_elemClasses . "\" />";
                    break;
            }

        }

        return $totalHTML;

    }

}