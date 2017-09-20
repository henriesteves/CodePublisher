<?php

namespace CodePublisher;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
{
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo('CodePublisher\User');
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Title', 'Subtitle', 'Price', 'Actions'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Title':
                return $this->title;
            case 'Subtitle':
                return $this->subtitle;
            case 'Price':
                return $this->price;
        }
    }
}
