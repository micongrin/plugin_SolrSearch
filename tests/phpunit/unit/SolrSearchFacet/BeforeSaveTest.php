<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=80; */

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


class SolrSearchFacetTest_BeforeSave extends SolrSearch_Case_Default
{


    /**
     * Create a facet for the Dublin Core "Title" element.
     */
    public function setUp()
    {

        parent::setUp();

        $title = $this->elementTable->findByElementSetNameAndElementName(
            'Dublin Core', 'Title'
        );

        $this->facet = new SolrSearchFacet($title);

    }


    /**
     * If an empty value is saved for the facet label, it should be reverted
     * to the original label.
     */
    public function testRevertEmptyLabelToOriginal()
    {

        $this->facet->label = '';
        $this->facet->save();

        $this->assertEquals('Title', $this->facet->label);

    }


    /**
     * If whitespace is saved for the facet label, it should be reverted to
     * the original label.
     */
    public function testRevertWhitespaceLabelToOriginal()
    {

        $this->facet->label = ' ';
        $this->facet->save();

        $this->assertEquals('Title', $this->facet->label);

    }


    /**
     * When a custom label is saved, it should be preserved.
     */
    public function testPreserveCustomLabel()
    {

        $this->facet->label = 'Custom Label';
        $this->facet->save();

        $this->assertEquals('Custom Label', $this->facet->label);

    }


}
