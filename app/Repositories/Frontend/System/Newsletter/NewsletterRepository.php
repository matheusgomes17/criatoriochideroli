<?php

namespace SKT\Repositories\Frontend\System\Newsletter;

use Illuminate\Support\Facades\DB;
use SKT\Exceptions\GeneralException;
use SKT\Models\System\Newsletter\Newsletter;
use SKT\Repositories\BaseRepository;
use SKT\Events\Frontend\System\Newsletter\NewsletterCreated;

/**
 * Class NewsletterRepository.
 */
class NewsletterRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Newsletter::class;

    /**
     * @param array $data
     *
     * @return static
     */
    public function create(array $data)
    {
        $newsletter = self::MODEL;
        $newsletter = new $newsletter();
        $newsletter->name = $data['name'];
        $newsletter->email = $data['email'];

        if (is_null($newsletter->name)) {
            throw new GeneralException('Você deve inserir um nome!');
        }

        if (is_null($newsletter->email)) {
            throw new GeneralException('Você deve inserir um e-mail válido!');
        }

        DB::transaction(function () use ($newsletter) {

            if ($newsletter->save()) {

                event(new NewsletterCreated($newsletter));
            }
        });

        return $newsletter;
    }

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }
}