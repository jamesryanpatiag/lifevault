<?php

namespace App\Enums;

class ClientStatusEnum extends AbstractEnum
{
    const LEADS = "LEADS";
    const FOR_APPOINTMENT = "FOR_APPOINTMENT";
    const FOR_PRESENTATION = "FOR_PRESENTATION";
    const SUBMISSION_OF_PROPOSAL = "SUBMISSION_OF_PROPOSAL";
    const CLOSED_DEAL = "CLOSED_DEAL";
    const POLICY_INFORCED_APPROVED = "POLICY_INFORCED_APPROVED";

    public static function getTitle($code) {
        switch ($code) {
            case self::LEADS:
                return 'Leads';
            break;
            case self::FOR_APPOINTMENT:
                return 'For Appointment';
            break;
            case self::FOR_PRESENTATION:
                return 'For Presentation';
            break;
            case self::SUBMISSION_OF_PROPOSAL:
                return 'Submission of Proposal';
            break;
            case self::CLOSED_DEAL:
                return 'Closed Deal';
            break;
            case self::POLICY_INFORCED_APPROVED:
                return 'Policy Inforced/Approved';
            break;
        }
    }
}