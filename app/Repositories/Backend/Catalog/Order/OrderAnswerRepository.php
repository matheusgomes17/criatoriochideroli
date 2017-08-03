<?php

namespace SKT\Repositories\Backend\Catalog\Order;

use Illuminate\Support\Facades\DB;
use SKT\Events\Backend\Catalog\Order\OrderAnswerCreated;
use SKT\Models\Catalog\Order\OrderAnswer;
use SKT\Repositories\Backend\Catalog\Order\OrderRepository;
use SKT\Repositories\BaseRepository;
use SKT\Exceptions\GeneralException;

/**
 * Class OrderAnswerRepository.
 */
class OrderAnswerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = OrderAnswer::class;

    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];
        $answer = $this->createStub($data);

        DB::transaction(function () use ($answer, $data) {
            if ($answer->save()) {

                $order = $this->order->find($answer->order_id);
                $order->status = 0;
                $order->manager_id = auth()->user()->id;
                $order->save();

                event(new OrderAnswerCreated($answer));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.catalog.orders.create_error'));
        });
    }

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createStub($input)
    {
        $answer = self::MODEL;
        $answer = new $answer();
        $answer->user_id = (int) auth()->user()->id;
        $answer->order_id = (int) $input['order_id'];
        $answer->msg = (string) $input['answer'];

        return $answer;
    }
}
