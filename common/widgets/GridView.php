<?php

/**
 * @package   yii2-grid
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @version   3.1.1
 */

namespace common\widgets;

use Yii;
//use yii\base\InvalidConfigException;
//use yii\bootstrap\ButtonDropdown;
//use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//use yii\helpers\Json;
//use yii\helpers\Url;
//use yii\web\JsExpression;
//use yii\web\View;
//use yii\widgets\Pjax;



/**
 * Enhances the Yii GridView widget with various options to include Bootstrap specific styling enhancements. Also
 * allows to simply disable Bootstrap styling by setting `bootstrap` to false. Includes an extended data column for
 * column specific enhancements.
 *
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since  1.0
 */
class GridView extends \kartik\grid\GridView
{  
    public $emptyCell = '';
            
    public function renderItems()
    {
        $caption = $this->renderCaption();
        $columnGroup = $this->renderColumnGroup();
        $tableHeader = $this->showHeader ? $this->renderTableHeader() : false;
        $tableBody = $this->renderTableBody();
        $tableFooter = $this->showFooter ? $this->renderTableFooter() : false;
        $content = array_filter([
            $caption,
            $columnGroup,
            $tableHeader,
            $tableFooter,
            $tableBody,
        ]);
//        $filters=$this->renderFilters();
       
                                    
        return Html::tag('table', implode("\n", $content), $this->tableOptions);
    }
     public function renderTableHeader()
    {
        $cells = [];
        foreach ($this->columns as $index => $column) {
            /* @var DataColumn $column */
            if ($this->resizableColumns && $this->persistResize) {
                $column->headerOptions['data-resizable-column-id'] = "kv-col-{$index}";
            }
            $cells[] = $column->renderHeaderCell();
        }
        $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
        if ($this->filterPosition == self::FILTER_POS_HEADER) {
            $content =  $content;
        } elseif ($this->filterPosition == self::FILTER_POS_BODY) {
            $content .= $this->renderFilters();
        }
        return "<thead>\n" .
        $this->generateRows($this->beforeHeader) . "\n" .
        $content . "\n" .
        $this->generateRows($this->afterHeader) . "\n" .
        "</thead>";
    }
    public function renderFilters()
    {
        if ($this->filterModel !== null) {
            $cells = [];
          
            foreach ($this->columns as $column) {
        
        
                /* @var $column Column */
        
                $cells[] = '<div class="col-md-3">'.$column->renderFilterCell().'</div>'; 
//        $cells[] = $column->renderFilterCell(); 
            }
//        return  implode('', $cells);
            
             return Html::tag('tr', implode('', array_diff($cells, [$cells[0]])), $this->filterRowOptions);
        } else {
            return '';
        }
    }
//            
    public function renderSection($name)
    {
        switch ($name) {
            case '{summary}':
                return $this->renderSummary();
            case '{filters}':
                return $this->renderFilters();
            case '{items}':
                return $this->renderItems();
            case '{pager}':
                return $this->renderPager();
            case '{sorter}':
                return $this->renderSorter();
            default:
                return false;
        }
    }
}
