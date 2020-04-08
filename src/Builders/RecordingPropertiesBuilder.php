<?php

namespace SquareetLabs\LaravelOpenVidu\Builders;

use SquareetLabs\LaravelOpenVidu\Enums\MediaMode;
use SquareetLabs\LaravelOpenVidu\Enums\OutputMode;
use SquareetLabs\LaravelOpenVidu\Enums\RecordingLayout;
use SquareetLabs\LaravelOpenVidu\Exceptions\OpenViduInvalidArgumentException;
use SquareetLabs\LaravelOpenVidu\RecordingProperties;

/**
 * Class RecordingPropertiesBuilder
 * @package SquareetLabs\LaravelOpenVidu\Builders
 */
class RecordingPropertiesBuilder implements BuilderInterface
{
    /**
     * @param  array  $properties
     * @return RecordingProperties|null
     * @throws OpenViduInvalidArgumentException
     */
    public static function build(array $properties)
    {
        if (array_key_exists('session', $properties)) {
            return new RecordingProperties(
                $properties['session'],
                array_key_exists('name', $properties) ? $properties['name'] : '',
                array_key_exists('outputMode', $properties) ? $properties['outputMode'] : OutputMode::COMPOSED,
                array_key_exists('recordingLayout', $properties) ? $properties['recordingLayout'] : RecordingLayout::BEST_FIT,
                array_key_exists('resolution', $properties) ? $properties['resolution'] : null,
                array_key_exists('hasAudio', $properties) ? $properties['hasAudio'] : true,
                array_key_exists('hasVideo', $properties) ? $properties['hasVideo'] : true,
                array_key_exists('customLayout', $properties) ? $properties['customLayout'] : MediaMode::ROUTED
            );
        }
        throw new OpenViduInvalidArgumentException('RecordingPropertiesBuilder::build spects an array with session key');
    }
}
