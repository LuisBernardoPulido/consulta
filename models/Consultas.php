<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "p10_consultas".
 *
 * @property integer $p10_id
 * @property string $p10_tipo
 * @property string $p10_valor
 * @property integer $p10_usuAlta
 * @property string $p10_fecAlta
 */
class Consultas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p10_consultas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p10_tipo'], 'string'],
            [['p10_usuAlta'], 'integer'],
            [['p10_fecAlta'], 'safe'],
            [['p10_valor'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p10_id' => 'ID',
            'p10_tipo' => 'Tipo de consulta',
            'p10_valor' => 'Folio/Clave',
            'p10_usuAlta' => 'Usuario de Alta',
            'p10_fecAlta' => 'Fecha de Alta',
        ];
    }
}
