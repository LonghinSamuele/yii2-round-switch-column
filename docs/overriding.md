Overriding
---

### Preview

![Override preview](https://user-images.githubusercontent.com/1450983/37549491-99d87fb4-2991-11e8-92d2-865784cbf3b6.png)


### 1. Override switch direction

By default switch styles includes `left` and `right` css classes.

You could override RoundSwitchColumn view to add this.

In your app config

```php
'view' => [
    'theme' => [
        'pathMap' => [
            '@nickdenry/grid/toggle/views' => '@app/views/grid/toggle' //@backend or @frontend instead @app for advanced
        ],
    ],
],
```

Copy `switch.php` from your 'vendor/nick-denry/yii2-round-switch-column/src/views' to '@app/views/grid/toggle' and change `left` to `right` class.

```php
<label class="yii2-round-switch right"> <!-- set left or right here -->
    <?= Html::checkbox($name, $checked, [
        'data-id' => $model->id,
    ]); ?>
    <div class="slider round"></div>
</label>
```

### 2. Change switch color and error diplaying

You could change Round Switch color by overriding its css via your application config.

Add folowing lines to `components` `assetManger` section:

```php
    'assetManager' => [
        'bundles' => [
            'nickdenry\grid\toggle\assets\RoundSwitchAsset' => [
                'sourcePath' => null,
                'basePath' => '@webroot',
                'baseUrl' => '@web',
                'css' => [
                    'css/round-switch.css',
                ],
                'js' => [
                    'js/round-switch.js'
                ],
            ],
        ],
        /* Other asset manager options */
    ],
```

Copy `round-switch.css` and `round-switch.js` from 'vendor/nick-denry/yii2-round-switch-column/src/web' to application 'web'.

Now you could change switch color i.e. to bootstrap primary `#428bca`

```css
.yii2-round-switch input:checked + .slider {
  background-color: #428bca;
}
```

Change error display styling

```css
.yii2-round-switch.error .slider {
    box-shadow: 0px 0px 3px #f00;
}
.yii2-round-switch.error .slider:before {
    box-shadow: 0px 0px 5px #f00;
}
```