<?php

namespace app\dto;

class VacancyItemDto
{
    private $id;
    private $name;
    private $salary;
    private $description;

    public function __construct($id, $name, $salary, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->description = $description;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'salary' => $this->salary,
            'description' => $this->description
        ];
    }
}