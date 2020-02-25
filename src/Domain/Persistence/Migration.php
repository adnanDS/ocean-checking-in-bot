<?php declare(strict_types=1);

namespace DemigrantSoft\Domain\Persistence;

interface Migration
{
    public function up(): void;
    public function down(): void;
}
