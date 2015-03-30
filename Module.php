<?php

namespace vova07\blogs;

use Yii;

/**
 * Module [[Blogs]]
 * Yii2 blogs module.
 */
class Module extends \vova07\base\components\Module
{
    /**
     * @inheritdoc
     */
    public static $name = 'blogs';

    /**
     * @var integer Posts per page
     */
    public $recordsPerPage = 20;

    /**
     * @var boolean Whether posts need to be moderated before publishing
     */
    public $moderation = true;

    /**
     * @var string Preview path
     */
    public $previewPath = '@statics/web/blogs/previews/';

    /**
     * @var string Image path
     */
    public $imagePath = '@statics/web/blogs/images/';

    /**
     * @var string Files path
     */
    public $filePath = '@statics/web/blogs/files';

    /**
     * @var string Files path
     */
    public $contentPath = '@statics/web/blogs/content';

    /**
     * @var string Images temporary path
     */
    public $imagesTempPath = '@statics/temp/blogs/images/';

    /**
     * @var string Preview URL
     */
    public $previewUrl = '/statics/blogs/previews';

    /**
     * @var string Image URL
     */
    public $imageUrl = '/statics/blogs/images';

    /**
     * @var string Files URL
     */
    public $fileUrl = '/statics/blogs/files';

    /**
     * @var string Files URL
     */
    public $contentUrl = '/statics/blogs/content';

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, $config = [])
    {
        if (!isset($config['viewPath'])) {
            if ($this->isBackend === true) {
                $config['viewPath'] = '@vova07/blogs/views/backend';
            } else {
                $config['viewPath'] = '@vova07/blogs/views/frontend';
            }
        }

        parent::__construct($id, $parent, $config);
    }
}
