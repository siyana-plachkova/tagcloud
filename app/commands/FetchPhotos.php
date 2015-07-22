<?php

use Carbon\Carbon;
use Illuminate\Console\Command;
use MetzWeb\Instagram\Instagram;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FetchPhotos extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'photos:fetch';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch photos from given source and tag them using Imagga\'s API';


	private $source;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->source = new Instagram(Config::get('apis.instagram.key'));
	}

	private function getTags($image_url)
	{
		$endpoint = Config::get('apis.imagga.endpoint') . Config::get('apis.imagga.tagging_endpoint');
		$request = \Httpful\Request::get($endpoint . '?url=' . $image_url)
			->addHeader('Authorization', Config::get('apis.imagga.auth'))
            ->send();

        return $request->body->results[0]->tags;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */

	public function fire()
	{
		$popular_media = $this->source->getPopularMedia();
		foreach ($popular_media->data as $media)
		{
			$image_url = $media->images->standard_resolution->url;
			$created_at = intval($media->created_time);

			$image_count = Image::where('url', '=', $image_url)->count();
			if ($image_count > 0)
			{
				continue;
			}

			$tags = $this->getTags($image_url);

			$image = new Image;
			$image->url = $image_url;
			$image->source = 'instagram';
			$image->created_at = Carbon::now();
			$image->save();

			$tags_objects = array();
			foreach ($tags as $tag)
			{
				$tag_object = new Tag;
				$tag_object->name = $tag->tag;
				$tag_object->confidence = $tag->confidence;
				$tag_object->image()->associate($image);
				$tag_object->save();
				array_push($tags_objects, $tag_object);
			}

			$image->tags()->saveMany($tags_objects);

			echo '.';
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
