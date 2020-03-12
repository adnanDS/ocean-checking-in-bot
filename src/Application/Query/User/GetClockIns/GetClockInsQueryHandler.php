<?php declare(strict_types=1);

namespace DemigrantSoft\ClockInBot\Application\Query\User\GetClockIns;

use DemigrantSoft\ClockInBot\Domain\Model\UserSchedule\ValueObject\ClockIns;
use DemigrantSoft\ClockInBot\Domain\Service\User\UserFinderByReference;
use DemigrantSoft\ClockInBot\Domain\Service\UserClientData\UserClientDataFinder;
use DemigrantSoft\ClockInBot\Domain\Service\UserSettings\UserSettingsFinder;
use DemigrantSoft\ClockInBot\Infrastructure\Service\ClockIn\ClientFactory;

final class GetClockInsQueryHandler
{
    private UserFinderByReference $userFinder;
    private UserSettingsFinder $settingsFinder;
    private UserClientDataFinder $clientDataFinder;
    private ClientFactory $factory;

    public function __construct(UserFinderByReference $userFinder, UserSettingsFinder $settingsFinder, UserClientDataFinder $clientDataFinder, ClientFactory $factory)
    {
        $this->userFinder = $userFinder;
        $this->settingsFinder = $settingsFinder;
        $this->clientDataFinder = $clientDataFinder;
        $this->factory = $factory;
    }

    public function __invoke(GetClockInsQuery $query): ClockIns
    {
        $user = $this->userFinder->execute($query->userReference());

        $settings = $this->settingsFinder->execute($user->aggregateId());
        $data = $this->clientDataFinder->execute($user->aggregateId());

        $client = $this->factory->build($settings->platform(), $data);

        $from = null !== $query->from()
            ? $query->from()
            : new \DateTimeImmutable();

        $to = null !== $query->to()
            ? $query->to()
            : $from;

        return $client->clockIns($from, $to);
    }
}
