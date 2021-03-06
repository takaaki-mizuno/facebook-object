<?php

namespace TakaakiMizuno\FacebookObject\tests;

class testGetAccount extends testBase
{
    public function testAdAccount()
    {

        $session = $this->getSession();
        $repository = new \TakaakiMizuno\FacebookObject\Repositories\AdAccountRepository($session);
        $adAccounts = $repository->all();

        $this->assertTrue(is_array($adAccounts));

        $adAccount = $adAccounts[1];
        $this->assertInstanceOf('\TakaakiMizuno\FacebookObject\Objects\AdAccount', $adAccount, 'object is AdAccount');
        $this->assertInstanceOf('DateTimeZone', $adAccount->getTimeZone(), 'Check Time Zone');

        $adImages = $adAccount->adimages;

        $this->assertTrue(is_array($adImages));
        $adImage = $adImages[0];

        $this->assertInstanceOf('\TakaakiMizuno\FacebookObject\Objects\AdImage', $adImage, 'object is AdImage');
        $this->assertNotEmpty($adImage->permalink_url, 'Permalink Exists');

        $adVideos = $adAccount->advideos;

        $this->assertTrue(is_array($adVideos));
        $adVideo = $adVideos[0];

        $this->assertInstanceOf('\TakaakiMizuno\FacebookObject\Objects\AdVideo', $adVideo, 'object is AdVideo');

    }
}