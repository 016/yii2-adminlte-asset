<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";

// add after box-body if need x-scroll table-responsive
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form box box-primary">
    <?= "<?php " ?>$form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body">

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        $tmpString = $generator->generateActiveField($attribute);
        $tmpString = str_replace("')->", "', [
                'template' => \$publicTemplate
        ])->", $tmpString);
        echo "        <?= " . $tmpString . " ?>\n\n";
    }
} ?>
    </div>
    <div class="box-footer">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?= "<?php " ?>ActiveForm::end(); ?>
</div>
