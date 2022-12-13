<?php

class BaseHeroController extends TwigBaseController
{
    public function getContext(): array
    {
        $context = parent::getContext();
        $query = $this->pdo->query("SELECT * FROM attributes");
        $attributes = $query->fetchAll();
        $context['attributes'] = $attributes;
   

        return $context;
    }
}