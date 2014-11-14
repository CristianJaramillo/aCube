<?php namespace Linfo;

interface LinfoInterface
{
	/**
	 * @return array
	 */
	public function getCore();

	/**
	 * @return array
	 */
	public function getDevice();

	/**
	 * @return array
	 */
	public function getHD();

	/**
	 * @return array
	 */
	public function getMemory();

	/**
	 * @return array
	 */
	public function getMount();

	/**
	 * @return array
	 */
	public function getSoundCard();

	/**
	 * @return array
	 */
	public function setupCore();

	/**
	 * @return array
	 */
	public function setupDevice();

	/**
	 * @return array
	 */
	public function setupHD();

	/**
	 * @return array
	 */
	public function setupMemory();

	/**
	 * @return array
	 */
	public function setupMount();

	/**
	 * @return array
	 */
	public function setupSoundCard();
}