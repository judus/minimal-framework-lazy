<?php namespace Maduser\Minimal\Exceptions;

/**
 * Interface ExceptionInterface
 *
 * @package Maduser\Minimal\Interfaces
 */
interface ExceptionInterface
{
	/**
	 * @return mixed
	 */
	public function getMessage();

	/**
	 * @return mixed
	 */
	public function getCode();

	/**
	 * @return mixed
	 */
	public function getFile();

	/**
	 * @return mixed
	 */
	public function getLine();

	/**
	 * @return mixed
	 */
	public function getTrace();

	/**
	 * @return mixed
	 */
	public function getTraceAsString();

	/**
	 * @return mixed
	 */
	public function __toString();

	/**
	 * ExceptionInterface constructor.
	 *
	 * @param null $message
	 * @param $code
	 */
	public function __construct($message = null, $code = 0);
}