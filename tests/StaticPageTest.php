<?php


class StaticPageTest extends TestCase
{
    /**
     * 測試首頁是否可以訪問，
     * 應該會看到 HackerSir CTF 的字樣
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
            ->see('HackerSir CTF');
    }

    /**
     * 測試關於頁面是否可以訪問
     * 應該會看到 關於我們 的字樣
     *
     * @return void
     */
    public function testAboutPage()
    {
        $this->visit('about')
            ->see('關於我們');
    }
}
