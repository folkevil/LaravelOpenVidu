<?php

namespace SquareetLabs\LaravelOpenVidu\Events;


/**
 * Class RecordingStatusChanged
 * @package SquareetLabs\LaravelOpenVidu\Events
 */
class RecordingStatusChanged
{
    /**
     * @var string $sessionId
     * Session for which the event was triggered
     * A string with the session unique identifier
     */
    public $sessionId;

    /**
     * @var int $timestamp
     * Time when the event was triggered
     * UTC milliseconds
     */
    public $timestamp;


    /**
     * @var string $participantId
     * Identifier of the participant
     * A string with the participant unique identifier
     */
    public $participantId;

    /**
     * @var int $startTime
     * Time when the recording started
     * UTC milliseconds
     */
    public $startTime;

    /**
     * @var string $id
     * Unique identifier of the recording
     * A string with the recording unique identifier
     */
    public $id;

    /**
     * @var string $name
     * Name given to the recording file
     * A string with the recording name
     */
    public $name;


    /**
     * @var string $outputMode
     * Output mode of the recording (COMPOSED or INDIVIDUAL)
     * A string with the recording output mode
     */
    public $outputMode;


    /**
     * @var bool $hasAudio
     * Wheter the recording file has audio or not
     *    [true,false]
     */
    public $hasAudio;

    /**
     * @var bool $hasVideo
     * Wheter the recording file has video or not
     *    [true,false]
     */
    public $hasVideo;

    /**
     * @var string $recordingLayout
     * The type of layout used in the recording. Only defined if outputMode is COMPOSED and hasVideo is true
     *  A RecordingLayout value (BEST_FIT, PICTURE_IN_PICTURE, CUSTOM ...)
     */
    public $recordingLayout;

    /**
     * @var string $resolution
     * Resolution of the recorded file. Only defined if outputMode is COMPOSED and hasVideo is true
     * A string with the width and height of the video file in pixels. e.g. "1280x720"
     */
    public $resolution;

    /**
     * @var int $size
     * The size of the video file. 0 until status is stopped
     * Bytes
     */
    public $size;

    /**
     * @var int $duration
     * Duration of the video file. 0 until status is stopped
     * Seconds
     */
    public $duration;

    /**
     * @var string $status
     * Status of the recording
     * ["started","stopped","ready","failed"]
     */
    public $status;

    /**
     * @var string $reason
     * Why the recording stopped. Only defined when status is stopped or ready
     * ["recordingStoppedByServer","lastParticipantLeft","sessionClosedByServer","automaticStop","openviduServerStopped","mediaServerDisconnect"]
     */
    public $reason;

    /**
     * @var string $event
     * Openvidu server webhook event
     */
    public $event;

    /**
     * Create a new SessionCreated event instance.
     * @param  array  $data
     */
    public function __construct(array $data)
    {
        $this->sessionId = $data['sessionId'];
        $this->timestamp = $data['timestamp'];
        if (array_key_exists('participantId', $data)) {
            $this->participantId = $data['participantId'];
        }
        $this->startTime = $data['startTime'];
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->outputMode = $data['outputMode'];
        $this->hasAudio = $data['hasAudio'];
        $this->hasVideo = $data['hasVideo'];
        $this->recordingLayout = $data['recordingLayout'];
        $this->resolution = $data['resolution'];
        $this->status = $data['status'];
        if (array_key_exists('reason', $data)) {
            $this->size = $data['size'];
            $this->duration = $data['duration'];
            $this->reason = $data['reason'];
        }
        $this->event = $data['event'];
    }
}