<?php

/*
 * This file is part of the PDF Version Converter.
 *
 * (c) Thiago Rodrigues <xthiago@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reloxx13\PDFVersionConverter\Converter;

/**
 * Encapsulates the knowledge about gs command.
 *
 * @author Thiago Rodrigues <xthiago@gmail.com>
 */
class GhostscriptConverterCommand {
	/**
	 * @var Filesystem
	 */
	protected $baseCommand = 'gs -sDEVICE=pdfwrite -dCompatibilityLevel=%s -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -dColorConversionStrategy=/LeaveColorUnchanged -dEncodeColorImages=false -dEncodeGrayImages=false -dEncodeMonoImages=false -dDownsampleMonoImages=false -dDownsampleGrayImages=false -dDownsampleColorImages=false -dAutoFilterColorImages=false -dAutoFilterGrayImages=false -dColorImageFilter=/FlateEncode -dGrayImageFilter=/FlateEncode  -sOutputFile=%s %s';
	
	public function __construct() {
	}
	
	public function run($originalFile, $newFile, $newVersion) {
		$command = sprintf($this->baseCommand, $newVersion, $newFile, escapeshellarg($originalFile));
		@system($command, $result);
		if ($result !== 0) {
			throw new \RuntimeException($result);
		}
	}
}
