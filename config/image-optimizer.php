<?php

use Spatie\ImageOptimizer\Optimizers\Cwebp;
use Spatie\ImageOptimizer\Optimizers\Gifsicle;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Optipng;
use Spatie\ImageOptimizer\Optimizers\Pngquant;
use Spatie\ImageOptimizer\Optimizers\Svgo;

return [
    /*
     * When calling `optimize` the package will automatically determine which optimizers
     * should run for the given image.
     *
     * CONFIGURED FOR LOSSLESS COMPRESSION - No quality degradation
     */
    'optimizers' => [

        Jpegoptim::class => [
            // NO -m flag = lossless (no quality reduction)
            '--strip-all',  // strips metadata (EXIF, comments) - lossless
            '--all-progressive',  // progressive loading - lossless
        ],

        // Pngquant DISABLED - it's lossy compression
        // Pngquant::class => [
        //     '--force',
        // ],

        Optipng::class => [
            '-i0', // non-interlaced output
            '-o2', // optimization level 2 (good balance)
            '-quiet',
        ],

        Svgo::class => [
            '--disable=cleanupIDs', // prevents ID conflicts
        ],

        Gifsicle::class => [
            '-b', // required
            '-O3', // maximum lossless optimization
        ],

        Cwebp::class => [
            '-lossless', // LOSSLESS webp compression
            '-m 6', // slowest but best compression
            '-mt', // multithreading
        ],
    ],

    /*
    * The directory where your binaries are stored.
    * Only use this when you binaries are not accessible in the global environment.
    */
    'binary_path' => '',

    /*
     * The maximum time in seconds each optimizer is allowed to run separately.
     */
    'timeout' => 60,

    /*
     * If set to `true` all output of the optimizer binaries will be appended to the default log.
     * You can also set this to a class that implements `Psr\Log\LoggerInterface`.
     */
    'log_optimizer_activity' => false,
];
