<?php

interface Expression
{
    public function interpret($str): bool;
}

class TerminateExpression implements Expression
{
    private string $data = "";

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function interpret($str): bool
    {
        return str_contains($str, $this->data);
    }
}

class OrExpression implements Expression
{
    private ?TerminateExpression $expression1 = null;
    private ?TerminateExpression $expression2 = null;

    public function __construct(?TerminateExpression $expression1, ?TerminateExpression $expression2)
    {
        $this->expression1 = $expression1;
        $this->expression2 = $expression2;
    }

    public function interpret($str): bool
    {
        return ($this->expression1 !== null && $this->expression1->interpret($str))
            || ($this->expression2 !== null && $this->expression2->interpret($str));
    }
}

class AndExpression implements Expression
{
    private ?TerminateExpression $expression1 = null;
    private ?TerminateExpression $expression2 = null;

    public function __construct(?TerminateExpression $expression1, ?TerminateExpression $expression2)
    {
        $this->expression1 = $expression1;
        $this->expression2 = $expression2;
    }

    public function interpret($str): bool
    {
        if ($this->expression1 !== null && $this->expression2 !== null) {
            return $this->expression1->interpret($str) && $this->expression2->interpret($str);
        }
        return false;
    }
}

function getAdultMan($str): bool
{
    $genderExpression = new TerminateExpression('男');
    $ageExpression = new TerminateExpression('>18');
    return (new AndExpression($genderExpression, $ageExpression))->interpret($str);
}

function getMinorityFemale($str): bool
{
    $genderExpression = new TerminateExpression('女');
    $ageExpression = new TerminateExpression('>18');
    return (new OrExpression($genderExpression, $ageExpression))->interpret($str);
}

$tom = "姓名：Tom, 年龄：>18, 性别：男";
$cherry = "姓名：cherry, 年龄：<18, 性别：女";

if (getAdultMan($tom)) {
    echo "tom 是成年 男性" . PHP_EOL;
} else {
    echo "tom 未成年 或者 是女性" . PHP_EOL;
}

if (getMinorityFemale($cherry)) {
    echo "cherry 未成年 或者 是女性" . PHP_EOL;
} else {
    echo "cherry 已成年 且 是男性" . PHP_EOL;
}


