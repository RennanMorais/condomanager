<?php
namespace src\handlers;

use \src\models\Statement;

class StatementHandler {

    public static function addStatement($text) {
        $name = 'Administração';
        $date = date('Y-m-d H:i:s');
        Statement::insert([
            'name' => $name,
            'text' => $text,
            'date' => $date
        ])->execute();
        return true;
    }

    public static function getStatement() {
        $statementList = Statement::select()->orderBy('date', 'desc')->limit(5)->get();
        $statement = [];
        foreach($statementList as $statementItem) {
            $newStatement = new Statement();
            $newStatement->name = $statementItem['name'];
            $newStatement->text = $statementItem['text'];
            $newStatement->date = $statementItem['date'];
            $statement[] = $newStatement;
        }
        return $statement;
    }

}