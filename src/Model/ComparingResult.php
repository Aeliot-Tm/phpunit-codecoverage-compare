<?php

declare(strict_types=1);

namespace Aeliot\PHPUnitCodeCoverageBaseline\Model;

final class ComparingResult
{
    private bool $hasImprovement = false;

    /**
     * @var ComparingRow[]
     */
    private array $rows = [];

    /**
     * @var string[]
     */
    private array $regressedNames = [];

    public function addRow(ComparingRow $row): void
    {
        $this->rows[] = $row;
        if ($row->hasRegress()) {
            $this->regressedNames[] = $row->getName();
        } elseif ($row->hasProgress()) {
            $this->hasImprovement = true;
        }
    }

    /**
     * @return ComparingRow[]
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @return string[]
     */
    public function getRegressedNames(): array
    {
        return $this->regressedNames;
    }

    public function hasImprovement(): bool
    {
        return $this->hasImprovement;
    }
}
