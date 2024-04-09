<?php

/*
 * Copyright Humbly Arrogant Software Limited 2023-2024.
 *
 * Use of this software is governed by the Functional Source License, Version 1.1, Apache 2.0 Future License included in the LICENSE.md file and at https://github.com/BillaBear/billabear/blob/main/LICENSE.
 */

namespace App\DataMappers\Workflows;

use App\DataMappers\RefundDataMapper;
use App\Dto\Generic\App\Workflows\RefundCreatedProcess as AppDto;
use App\Entity\RefundCreatedProcess as Entity;

class RefundCreatedProcessDataMapper
{
    public function __construct(private RefundDataMapper $dataMapper)
    {
    }

    public function createAppDto(Entity $entity): AppDto
    {
        $dto = new AppDto();
        $dto->setId((string) $entity->getId());
        $dto->setState($entity->getState());
        $dto->setRefund($this->dataMapper->createAppDto($entity->getRefund()));
        $dto->setCreatedAt($entity->getCreatedAt());
        $dto->setUpdatedAt($entity->getUpdatedAt());
        $dto->setError($entity->getError());
        $dto->setHasError($entity->getHasError());

        return $dto;
    }
}