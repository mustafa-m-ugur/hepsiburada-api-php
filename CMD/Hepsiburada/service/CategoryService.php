<?php

namespace CMD\Hepsiburada\service;

use CMD\Hepsiburada\config\Endpoints;

class CategoryService extends HepsiburadaBaseService
{
    public function getAllCategories($getAllCategory)
    {
        $queryString = $this->generateQueryString($getAllCategory);
        $endpoint = $this->getUrl(Endpoints::catalog, Endpoints::allCategories, $queryString);
        return $this->request("GET", $endpoint);
    }

    public function getCategoryAttributes($categorID)
    {
        $url = $this->getUrl(Endpoints::catalog, Endpoints::getCategoriAttrributes);
        $url = $this->replaceParameters(["@categoriID" => $categorID], $url);
        return $this->request("GET", $url);
    }

    public function getAttributeValue($categorID, $attributeSlug)
    {
        $url = $this->getUrl(Endpoints::catalog, Endpoints::getAttributeValues);
        $url = $this->replaceParameters(["@categoriID" => $categorID, "@attributeSlug" => $attributeSlug], $url);
        return $this->request("GET", $url);
    }
}
