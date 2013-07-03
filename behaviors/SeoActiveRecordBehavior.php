<?php
/**
 * SeoActiveRecordBehavior class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-seo.behaviors
 */

class SeoActiveRecordBehavior extends CActiveRecordBehavior
{
    /**
     * @property string the route used for SEO.
     */
    public $route;
    /**
     * @property array GET parameters used for SEO.
     */
    public $params = array();

    /**
     * Returns the URL for this model.
     * @param array $params additional GET parameters (name=>value)
     * @return string the URL
     */
    public function createUrl($params=array())
    {
        return Yii::app()->createUrl($this->route, CMap::mergeArray($params, $this->evaluateParams($this->params)));
    }

    /**
     * Returns the absolute URL for this model.
     * @param array $params additional GET parameters (name=>value)
     * @return string the URL
     */
    public function createAbsoluteUrl($params=array())
    {
        return Yii::app()->createAbsoluteUrl($this->route, CMap::mergeArray($params, $this->evaluateParams($this->params)));
    }

    /**
     * Evaluates the given params.
     * @param array $params the parameters.
     * @return array the evaluated params.
     */
    protected function evaluateParams($params)
    {
        foreach ($params as $name => $value)
        {
            if (is_callable($value))
                $params[$name] = $this->evaluateExpression($value, array('data' => $this->owner));
        }
        return $params;
    }
}
