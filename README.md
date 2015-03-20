yii-seo
=======

Search engine optimization for the Yii PHP framework.

## Usage

In layout

```
    <?php Yii::app()->controller->widget(
        'vendor.crisu83.yii-seo.widgets.SeoHead',
        array(
            'httpEquivs'         => array(
                'Content-Type'     => 'text/html; charset=utf-8',
                'X-UA-Compatible'  => 'IE=edge,chrome=1',
                'Content-Language' => 'en-EN'
            ),
            'defaultTitle'       => "My default title",
            'defaultDescription' => "My default description",
            'defaultKeywords'    => "My default keywords",
        )
    ); ?>
```

In Controller

```
    public function behaviors()
    {
        return array(
            'seo' => array('class' => 'vendor.crisu83.yii-seo.behaviors.SeoBehavior'),
        );
    }

    public function filters()
    {
        return array(
            array('vendor.crisu83.yii-seo.filters.SeoFilter + view'), // apply the filter to the view-action
        );
    }
```

In view file

```

$this->title = [$model->title, "My cool site!"];
$this->metaDescription = "My page description";
$this->metaKeywords = "My page keywords";

```