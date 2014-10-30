<?php

class CustomGoogleMap extends DataExtension {

	private static $db = array(
		'Country' => 'Varchar',
		'Address' => 'Text',
		'PostCode' => 'Varchar',
		'Latitude' => 'Varchar',
        'Longitude' => 'Varchar',
        'ZoomLevel' => 'Int',
	);

	public static $casting = array(
        'FullAddress'   => 'HTMLText',
        'Location'      => 'Text',
        'Link'          => 'Text',
        'ImgURL'        => 'Text'
    );

	public static $defaults = array(
		'ShowMap' => false,
		'ZoomLevel' => 10,
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Map', new TextareaField('Address', 'Address'));
		$fields->addFieldToTab('Root.Map', new TextField('PostCode', 'PostCode'));
		$fields->addFieldToTab('Root.Map', new CountryDropdownField('Country', 'Country'));
		$fields->addFieldToTab('Root.Map', new NumericField('ZoomLevel', 'ZoomLevel'));


		// Advanced configuration options will be displayed as collapsed by default
		$config_fields = ToggleCompositeField::create(
			'MapConfig',
			'Custom Coordinates',
			array(
				new TextField('Latitude', 'Latitude'),
				new TextField('Longitude', 'Longitude'),
			)
		)->setHeadingLevel(4);
		$fields->addFieldToTab('Root.Map', $config_fields);
	}
}
