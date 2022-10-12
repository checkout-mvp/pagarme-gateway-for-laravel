<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use MartinsHumberto\PagarmeGateway\Rules\Subscription\CreatePlanSubscriptionValidation;
use MartinsHumberto\PagarmeGateway\Rules\Subscription\UpdateSplitSubscriptionValidation;
use MartinsHumberto\PagarmeGateway\Rules\Subscription\UpdateSubscriptionCardValidation;
use MartinsHumberto\PagarmeGateway\Rules\Subscription\CancelSubscriptionValidation;
use MartinsHumberto\PagarmeGateway\Rules\Subscription\CreatePlanValidation;
use MartinsHumberto\PagarmeGateway\Rules\Subscription\UpdatePlanValidation;
use RuntimeException;

trait Subscription
{
    public function createPlanSubscription(array $data)
    {
        $this->validate($data, CreatePlanSubscriptionValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->createSubscription($data);
        }
    }

    public function cancelSubscription($subscriptionId, array $data)
    {
        $this->validate($data, CancelSubscriptionValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->cancelSubscription($subscriptionId, $data);
        }
    }

    public function getSubscription(string $subscriptionId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->getSubscription($subscriptionId);
        }
    }

    public function getSubscriptions(
        $page = null, 
        $size = null, 
        $code = null,
        $billingType = null,
        $customerId = null,
        $planId = null,
        $cardId = null,
        $status = null,
        $nextBillingSince = null,
        $nextBillingUntil = null,
        $createdSince = null,
        $createdUntil = null
    ) {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->getSubscriptions(
                $page, 
                $size,
                $code,
                $billingType,
                $customerId,
                $planId,
                $cardId,
                $status,
                $nextBillingSince,
                $nextBillingUntil,
                $createdSince,
                $createdUntil
            );
        }
    }

    public function updateSubscriptionCard(array $data)
    {
        $this->validate($data, UpdateSubscriptionCardValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->updateSubscriptionCard($data);
        }
    }

    public function updateSplitSubscription(string $subscriptionId, array $data)
    {
        $this->validate($data, UpdateSplitSubscriptionValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->updateSplitSubscription($subscriptionId, $data);
        }
    }

    public function createPlan(array $data)
    {
        $this->validate($data, CreatePlanValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getPlans()->createPlan($data);
        }
    }

    public function updatePlan(string $planId, array $data)
    {
        $this->validate($data, UpdatePlanValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getPlans()->updatePlan($planId, $data);
        }
    }

    public function deletePlan(string $planId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getPlans()->deletePlan($planId);
        }
    }

    public function getPlans(
        $page = null, 
        $size = null, 
        $name = null,
        $status = null,
        $created_since = null,
        $created_until = null
    ) {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getPlans()->getPlans(
                $page, 
                $size, 
                $name,
                $status,
                $created_since,
                $created_until
            );
        }
    }

    public function getPlan($planId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getPlans()->getPlans($planId);
        }
    }

    public function updateSubscriptionBillingDate($subscriptionId, array $data)
    {
        $this->validate($data, [
            'next_billing_at' => 'required|date',
        ]);

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->updateSubscriptionBillingDate($subscriptionId, $data);
        }
    }

    public function updateSubscriptionDueDays($subscriptionId, array $data)
    {
        $this->validate($data, [
            'boleto_due_days' => 'required|date',
        ]);

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->updateSubscriptionDueDays($subscriptionId, $data);
        }
    }

    public function renewSubscription($subscriptionId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->renewSubscription($subscriptionId);
        }
    }

    public function updateSubscriptionPaymentMethod($subscriptionId, array $data)
    {
        $this->validate($data, [
            'payment_method' => 'required|string|in:credit_card,boleto,debit_card',
            'card_id' => 'nullable',
            'card_token' => 'nullable',
        ]);

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getSubscriptions()->updateSubscriptionPaymentMethod($subscriptionId, $data);
        }
    }

    public function getInvoices(
        $page = null,
        $size = null,
        $code = null,
        $customer_id = null,
        $subscription_id = null,
        $created_since = null,
        $created_until = null,
        $status = null,
        $due_since = null,
        $due_until = null,
        $customer_document = null
    ) {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getInvoices()->getInvoices(
                $page,
                $size,
                $code,
                $customer_id,
                $subscription_id,
                $created_since,
                $created_until,
                $status,
                $due_since,
                $due_until,
                $customer_document
            );
        }
    }
}
