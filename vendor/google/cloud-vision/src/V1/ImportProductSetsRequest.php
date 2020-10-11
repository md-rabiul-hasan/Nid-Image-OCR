<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/vision/v1/product_search_service.proto

namespace Google\Cloud\Vision\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for the `ImportProductSets` method.
 *
 * Generated from protobuf message <code>google.cloud.vision.v1.ImportProductSetsRequest</code>
 */
class ImportProductSetsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The project in which the ProductSets should be imported.
     * Format is `projects/PROJECT_ID/locations/LOC_ID`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The input content for the list of requests.
     *
     * Generated from protobuf field <code>.google.cloud.vision.v1.ImportProductSetsInputConfig input_config = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $input_config = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The project in which the ProductSets should be imported.
     *           Format is `projects/PROJECT_ID/locations/LOC_ID`.
     *     @type \Google\Cloud\Vision\V1\ImportProductSetsInputConfig $input_config
     *           Required. The input content for the list of requests.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Vision\V1\ProductSearchService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The project in which the ProductSets should be imported.
     * Format is `projects/PROJECT_ID/locations/LOC_ID`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The project in which the ProductSets should be imported.
     * Format is `projects/PROJECT_ID/locations/LOC_ID`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The input content for the list of requests.
     *
     * Generated from protobuf field <code>.google.cloud.vision.v1.ImportProductSetsInputConfig input_config = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Vision\V1\ImportProductSetsInputConfig
     */
    public function getInputConfig()
    {
        return isset($this->input_config) ? $this->input_config : null;
    }

    public function hasInputConfig()
    {
        return isset($this->input_config);
    }

    public function clearInputConfig()
    {
        unset($this->input_config);
    }

    /**
     * Required. The input content for the list of requests.
     *
     * Generated from protobuf field <code>.google.cloud.vision.v1.ImportProductSetsInputConfig input_config = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Vision\V1\ImportProductSetsInputConfig $var
     * @return $this
     */
    public function setInputConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Vision\V1\ImportProductSetsInputConfig::class);
        $this->input_config = $var;

        return $this;
    }

}

