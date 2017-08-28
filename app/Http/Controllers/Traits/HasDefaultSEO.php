<?php

namespace SKT\Http\Controllers\Traits;

/**
 * HasDefaultSEO
 */
trait HasDefaultSEO
{
    public function getDefaultSEO()
    {
        $this->getOpengraphTags();
        $this->getTwitterTags();

        return $this;
    }

    protected function getOpengraphTags()
    {
        return $this->seo()->opengraph()->addProperty('type', 'articles')
            ->addProperty('locale', 'pt-br')
            ->addProperty('locale:alternate', ['pt-pt', 'en-us'])
            ->addProperty('article:author', env('FACEBOOK_PERSONAL_LINK'))
            ->addProperty('article:publisher', env('FACEBOOK_SOCIAL_LINK'))
            ->addProperty('og:app_id', env('FACEBOOK_APP_ID'))
            ->addProperty('fb:pages', env('FACEBOOK_APP_PAGES'));
    }

    protected function getTwitterTags()
    {
        return $this->seo()->twitter()->setSite(env('TWITTER_URL'))
                ->addValue('card', 'summary_large_image')
                ->addValue('domain', route('frontend.index'));
    }
}
