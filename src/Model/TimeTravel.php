<?php

namespace BackToTheFutur\Model;

use DateTime;

class TimeTravel
{
    private $start;

    public function __construct(DateTime $start)
    {
        $this->start = $start;
    }

    public function getTravelInfo(DateTime $end)
    {
        $diff = $this->calculTravelInfo($end);
        return "Il y a $diff->y années, $diff->m mois, $diff->d jours, $diff->h heures, $diff->i minutes et $diff->s secondes entre les deux dates";
    }

    private function calculTravelInfo(DateTime $end)
    {
        if ($this->start > $end) {
            $diff = date_diff($this->start, $end);
        } else {
            $diff = date_diff($end, $this->start);
        }

        return $diff;
    }

    public function findDate($interval, $timeWay)
    {
        if ($timeWay === 'past') {
            $interval->invert = 1;
        }
        return $this->start->add($interval);
    }

    /**
     * @return DateTime
     */
    public function getStart(): DateTime
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     * @return TimeTravel
     */
    public function setStart(DateTime $start): TimeTravel
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEnd(): DateTime
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     * @return TimeTravel
     */
    public function setEnd(DateTime $end): TimeTravel
    {
        $this->end = $end;
        return $this;
    }
}
