<?php

namespace app\dto;

class VacancyItemDto
{
    private $name;
    private $salary;
    private $description;

    public function __construct($name, $salary, $description)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->description = $description;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'salary' => $this->salary,
            'description' => $this->description
        ];
    }
}