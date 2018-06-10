<?php

namespace BackToTheFutur\Controller;

use BackToTheFutur\Model\TimeTravel;
use DateInterval;
use DateTime;

class TimeTravelController extends AbstractController
{
    /**
     * Display result of traveling in time
     *
     * @return string
     */
    public function index()
    {
        if(empty($_POST['startDate']) || empty($_POST['endDate'])) {
            return $this->twig->render('index.html.twig', ['errorTravelInfo' => 'Veuillez remplir tous les champs :)']);
        }
        $startDate = new DateTime($_POST['startDate']);
        $endDate = new DateTime($_POST['endDate']);
        $timeTravel = new TimeTravel($startDate);
        $info = $timeTravel->getTravelInfo($endDate);
        return $this->twig->render('Travel/index.html.twig', ['timeTravel' => $info]);
    }

    public function findDate()
    {
        if(empty($_POST['startDate']) || empty($_POST['interval'])) {
            return $this->twig->render('index.html.twig', ['errorFindDate' => 'Veuillez remplir tous les champs :)']);
        }
        $startDate = new DateTime($_POST['startDate']);
        $interval = new DateInterval('PT' . $_POST['interval'] . 'S');
        $timeTravel = new TimeTravel($startDate);
        $date = $timeTravel->findDate($interval, $_POST['timeWay']);
        return $this->twig->render('Travel/findDate.html.twig', ['date' => $date->format('d/m/Y à H:i')]);
    }

    public function findStep()
    {
        if(empty($_POST['startDate']) || empty($_POST['endDate']) ||
            ($_POST['nbMonths'] == 0 && $_POST['nbWeeks'] == 0 && $_POST['nbDays'] == 0)) {
            return $this->twig->render('index.html.twig', [
                'errorFindStep' => 'Veuillez remplir tous les champs et/ou choisir une intervalle :)'
            ]);
        }
        $startDate = new DateTime($_POST['startDate']);
        $days = $_POST['nbDays'] + ($_POST['nbWeeks'] * 7);
        $interval = new DateInterval('P' . $_POST['nbMonths'] . 'M0W' . $days . 'D');
        $endDate = new DateTime($_POST['endDate']);
        $timeTravel = new TimeTravel($startDate);
        $steps = $timeTravel->backToFutureStepByStep($endDate, $interval);
        return $this->twig->render('Travel/steps.html.twig', ['steps' => $steps]);
    }
}
