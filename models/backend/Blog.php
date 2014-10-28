<?php

namespace vova07\blogs\models\backend;

use vova07\blogs\Module;
use Yii;

/**
 * Class Blog
 * @package vova07\blogs\models\backend
 * Blog model.
 *
 * @property integer $id ID
 * @property string $title Title
 * @property string $alias Alias
 * @property string $snippet Intro text
 * @property string $content Content
 * @property integer $views Views
 * @property integer $status_id Status
 * @property integer $created_at Created time
 * @property integer $updated_at Updated time
 */
class Blog extends \vova07\blogs\models\Blog
{
    /**
     * @var string Jui created date
     */
    private $_createdAtJui;

    /**
     * @var string Jui updated date
     */
    private $_updatedAtJui;

    /**
     * @return string Jui created date
     */
    public function getCreatedAtJui()
    {
        if (!$this->isNewRecord && $this->_createdAtJui === null) {
            $this->_createdAtJui = Yii::$app->formatter->asDate($this->created_at);
        }
        return $this->_createdAtJui;
    }

    /**
     * Set jui created date
     */
    public function setCreatedAtJui($value)
    {
        $this->_createdAtJui = $value;
    }

    /**
     * @return string Jui updated date
     */
    public function getUpdatedAtJui()
    {
        if (!$this->isNewRecord && $this->_updatedAtJui === null) {
            $this->_updatedAtJui = Yii::$app->formatter->asDate($this->updated_at);
        }
        return $this->_updatedAtJui;
    }

    /**
     * Set jui created date
     */
    public function setUpdatedAtJui($value)
    {
        $this->_updatedAtJui = $value;
    }

    /**
     * @return string Readable blog status
     */
    public function getStatus()
    {
        $statuses = self::getStatusArray();

        return $statuses[$this->status_id];
    }

    /**
     * @return array Status array.
     */
    public static function getStatusArray()
    {
        return [
            self::STATUS_UNPUBLISHED => Module::t('blogs', 'STATUS_UNPUBLISHED'),
            self::STATUS_PUBLISHED => Module::t('blogs', 'STATUS_PUBLISHED')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['status_id', 'in', 'range' => array_keys(self::getStatusArray())];
        $rules[] = [['createdAtJui', 'updatedAtJui'], 'date'];

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();
        $attributeLabels['createdAtJui'] = Module::t('blogs', 'ATTR_CREATED');
        $attributeLabels['updatedAtJui'] = Module::t('blogs', 'ATTR_UPDATED');

        return $attributeLabels;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['admin-create'] = [
            'title',
            'alias',
            'snippet',
            'content',
            'status_id',
            'preview_url',
            'image_url',
            'createdAtJui',
            'updatedAtJui'
        ];
        $scenarios['admin-update'] = [
            'title',
            'alias',
            'snippet',
            'content',
            'status_id',
            'preview_url',
            'image_url',
            'createdAtJui',
            'updatedAtJui'
        ];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->_createdAtJui) {
                $this->created_at = Yii::$app->formatter->asTimestamp($this->_createdAtJui);
            }
            if ($this->_updatedAtJui) {
                $this->updated_at = Yii::$app->formatter->asTimestamp($this->_updatedAtJui);
            }
            return true;
        } else {
            return false;
        }
    }
}
